import { Component, createEffect, createSignal, For } from "solid-js";
import { useParams } from "@solidjs/router";
import subjects from "../data/subjects.json";
import schedules from "../data/schedules.json";
import Subject from "../interfaces/Subject";
import Modal from "../components/Modal";
import ScheduleParams from "../interfaces/ScheduleParams";
import Sched from "../interfaces/Sched";
import ExtraHandler from "../components/ExtraHandler";

const Schedule: Component = () => {
  const params: ScheduleParams = useParams()

  const [opened, setOpened] = createSignal(false);
  const [modalSubject, setModalSubject] = createSignal({
    id: -1,
    name: "Placeholder",
    extra: []
  } as Subject)

  const [sanitizedSchedule, setSanitizedSchedule] = createSignal({
    name: "Placeholder",
    items: []
  } as Sched)

  const [currentSubject, setCurrentSubject] = createSignal(-1)

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
    setCurrentSubject(-1)
  })

  const openModal = (subject: Subject) => {
    setModalSubject(subject)
    setOpened(true)
  }

  const isCurrentSubject = (from: string, to: string, dayOfWeek: number, id: number): boolean => {
    const date = new Date();
    const now = date.toTimeString().split(' ')[0]

    const valid = dayOfWeek === date.getDay() && now > from && now < to;

    if (valid) {
      setCurrentSubject(id);
    }

    return valid;
  }

  return (
    <>
      <h4>{sanitizedSchedule().name}</h4>
      <figure>
        <table>
          <thead>
            <tr>
              <th>Monday</th>
              <th>Tuesday</th>
              <th>Wednesday</th>
              <th>Thursday</th>
              <th>Friday</th>
            </tr>
          </thead>
          <tbody>
            <For each={sanitizedSchedule().items}>{row => 
              <tr>
                <For each={row.ids}>{(subject, i) =>
                  <td style={{'background-color': isCurrentSubject(row.from, row.to, i(), subject) ? 'green' : 'transparent'}}>
                    {subjects[subject].extra.length > 0 ? (
                      <a class="clickable" onClick={() => openModal(subjects[subject] as Subject)}>{subjects[subject].name}</a>
                    ) : <span>{subjects[subject].name}</span>}
                  </td>
                }</For>
              </tr>
            }</For>
          </tbody>
        </table>
      </figure>
      <Modal opened={opened()} subject={modalSubject()} setOpened={setOpened} />
      {currentSubject() !== -1 ? (
        <details open>
          <summary>{(subjects[currentSubject()] as Subject).name}</summary>
          <ExtraHandler extra={(subjects[currentSubject()] as Subject).extra} />
        </details>
      ) : ''}
    </>
  );
};

export default Schedule;
