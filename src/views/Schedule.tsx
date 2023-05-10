import { type Component, createEffect, createSignal, For } from "solid-js";
import { useParams } from "@solidjs/router";
import Entry from "../interfaces/Entry";
import Modal from "../components/Modal";
import Sched from "../interfaces/Sched";
import ExtraHandler from "../components/ExtraHandler";
import entries from "../data/entries.json";
import schedules from "../data/schedules.json";

const Schedule: Component = () => {
  const params: {id: string} = useParams()

  const [date, setDate] = createSignal(new Date());
  const currentDay = () => date().getDay();
  const now = () => date().toTimeString().split(' ')[0];

  const [opened, setOpened] = createSignal(false);
  const [modalEntry, setModalEntry] = createSignal({
    id: -1,
    name: "Placeholder",
    extra: []
  } as Entry)

  const [sanitizedSchedule, setSanitizedSchedule] = createSignal({
    name: "Placeholder",
    items: []
  } as Sched)

  const [currentEntry, setCurrentEntry] = createSignal(-1)
  
  const getCurrentEntry = (): Entry => {
    return entries[currentEntry()] as Entry
  }

  const openModal = (entry: Entry) => {
    setModalEntry(entry)
    setOpened(true)
  }

  const isCurrentEntry = (from: string, to: string, dayOfWeek: number, id: number): boolean => {    
    const valid = dayOfWeek === currentDay() - 1 && now() > from && now() < to;

    if (valid) {
      setCurrentEntry(id);
    }

    return valid;
  }

  /**
   * On schedule change
   */
  createEffect(() => {
    if (!params.id) {
      setSanitizedSchedule(schedules[0])
    } else {
      const sanitizedId = parseInt(params.id) - 1;
      setSanitizedSchedule(sanitizedId in schedules ? schedules[sanitizedId] : {
        name: "Invalid",
        items: []
      })
    }
    setCurrentEntry(-1)
  })

  const refresh = () => setDate(new Date());

  return (
    <>
      <h4>{sanitizedSchedule().name}</h4>
      <figure>
        <table>
          <thead>
            <tr>
              {/* First header left intentionally blank */}
              <th></th>
              <For each={['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']}>{(day, i) =>
                <th>{i() === currentDay() - 1 ? (
                  <strong style="color: green">{day}</strong>
                ) : <span>{day}</span>}</th>
              }</For>
            </tr>
          </thead>
          <tbody>
            <For each={sanitizedSchedule().items}>{row => 
              <tr>
                <td>{row.from.slice(0, -3)} - {row.to.slice(0, -3)}</td>
                <For each={row.ids}>{(entry, i) =>
                  entry !== -1 ? (
                  <td style={{'background-color': isCurrentEntry(row.from, row.to, i(), entry) ? '#FED8B1' : 'inherit'}}>
                    {entries[entry].extra.length > 0 ? (
                      <a class="clickable" onClick={() => openModal(entries[entry] as Entry)}>{entries[entry].name}</a>
                    ) : <span>{entries[entry].name}</span>}
                  </td>) : <td>-</td>
                }</For>
              </tr>
            }</For>
          </tbody>
        </table>
      </figure>
      <button onClick={() => refresh()}>Refresh</button>
      {currentEntry() !== -1 ? (
        <details open>
          <summary>{getCurrentEntry().name}</summary>
          <ExtraHandler extra={getCurrentEntry().extra} />
        </details>
      ) : ''}
      <Modal opened={opened()} entry={modalEntry()} setOpened={setOpened} />
    </>
  );
};

export default Schedule;
