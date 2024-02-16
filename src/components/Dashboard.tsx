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
    <div class="grid" style={{"grid-template-columns": "repeat(2, 1fr)"}}>
      <For each={schds}>{schd => {
        return (
          <article>
            <header>
              <p><strong>{schd.subject.name}</strong></p>
            </header>
            {now.getDay() === schd.weekday ? <Tracker schd={schd} /> : <p>{schd.timezone.start} - {schd.timezone.finish}</p>}
          </article>
        )
      }}</For>
    </div>
  )
}
