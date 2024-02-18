import { For, createSignal, onMount } from "solid-js";
import { getWeekdays } from "../constants/weekdays";
import type Weekday from "../interfaces/Weekday";

export default function Weekdays() {
  const now = new Date()

  const [ weekdays, setWeekdays ] = createSignal<Weekday[]>([])

  // Get weekdays with offset from localStorage
  onMount(() => setWeekdays(getWeekdays()))

  return (
    <div class="grid two-cols">
      <For each={weekdays()}>{day => {
        return (
          <a role="button" classList={{focused: now.getDay() === day.id}} href={`/weekdays/${day.id}`}>{day.name}</a>
        )
      }}</For>
    </div>
  )
}
