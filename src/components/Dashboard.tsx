import { For } from "solid-js"
import type Schedule from "../models/Schedule"

interface Props {
  schedules: Schedule[]
} 

export default function Dashboard(props: Props) {
  // Quick workaround
  const schds = Object.values(props.schedules)
  return (
    <div class="grid" style={{"grid-template-columns": "repeat(2, 1fr)"}}>
      <For each={schds}>{(schd, i) => {
        return (
          <article>
            <header>
              <p>{schd.subject.name}</p>
            </header>
            <p>Time remaining: xd</p>
          </article>
        )
      }}</For>
    </div>
  )
}
