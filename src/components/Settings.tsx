import { createSignal, onMount } from "solid-js";
import { WEEKDAYS } from "../constants/weekdays";
import Storage from "../helpers/Storage";

export default function Settings() {
  const submit = (e: Event & { currentTarget: HTMLFormElement }) => {
    e.preventDefault()
    const formData = new FormData(e.currentTarget)
    
    const offset = formData.get("weekday-offset")

    if (offset !== null) {
      Storage.set("offset", offset.toString())
    }

    alert("Settings saved successfully!")
  }

  const [ defaultOffset, setDefaultOffset ] = createSignal(-1)

  onMount(() => {
    setDefaultOffset(Storage.offset())
  })

  return (
    <div class="container">
      <form onSubmit={submit}>
        <fieldset>
          <label>
            Weeks start on...
            <select name="weekday-offset">
              {WEEKDAYS.map(day => {
                return (
                  <option value={day.id} selected={day.id === defaultOffset()}>{day.name}</option>
                )
              })}
            </select>
          </label>
        </fieldset>
        <button type="submit">Submit</button>
      </form>
    </div>
  )
}
