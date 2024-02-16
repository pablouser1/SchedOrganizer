import { For } from "solid-js";
import WEEKDAYS from "../constants/weekdays";

export default function Weekdays() {
  return (
    <div class="grid two-cols">
      <For each={WEEKDAYS}>{(day, i) => {
        return (
          <article>
            <a href={`/weekdays/${i()}`}>{day}</a>
          </article>
        )
      }}</For>
    </div>
  )
}
