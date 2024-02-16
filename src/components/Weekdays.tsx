import { For } from "solid-js";
import WEEKDAYS from "../constants/weekdays";

export default function Weekdays() {
  const now = new Date()

  return (
    <div class="grid two-cols">
      <For each={WEEKDAYS}>{(day, i) => {
        return (
          <article classList={{focused: now.getDay() === i()}}>
            <a href={`/weekdays/${i()}`}>{day}</a>
          </article>
        )
      }}</For>
    </div>
  )
}
