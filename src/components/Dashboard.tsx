import { For } from "solid-js"
import type Schedule from "../models/Schedule"
import Tracker from "./Tracker"

interface Props {
  schedules: Schedule[]
} 

export default function Dashboard(props: Props) {
  const now = new Date()

  // Quick workaround
  const schds = Object.values(props.schedules)

  return (
    <div class="grid two-cols">
      <For each={schds}>{schd => {
        const track = now.getDay() === schd.weekday
        const tz = <p class="secondary">{schd.timezone.start} - {schd.timezone.finish}</p>
        return (
          <article>
            <header>
              <hgroup style={{"margin-bottom": "unset"}}>
                <p><strong>{schd.subject.name}</strong></p>
                {track ? tz : ''}
              </hgroup>
            </header>
            {track ? <Tracker schd={schd} /> : tz}
          </article>
        )
      }}</For>
    </div>
  )
}
