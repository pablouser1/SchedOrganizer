import { createSignal, onMount, onCleanup } from "solid-js"
import type Schedule from "../models/Schedule"
import Time from "../helpers/Time"

interface Props {
  schd: Schedule
}

export default function Tracker(props: Props) {
  const { schd } = props
  const now = new Date()
  const timeNow = new Time(now.toTimeString().split(' ')[0])
  const timeStart = new Time(schd.timezone.start)
  const timeFinish = new Time(schd.timezone.finish)

  const [ text, setText ] = createSignal("Loading...")
  let timer: number;

  onMount(() => {
    timer = setInterval(() => update(), 1000)
    update()
  })

  onCleanup(() => {
    clearInterval(timer)
  })

  const update = () => {
    timeNow.increment()

    const sbsFinish = timeNow.substract(timeFinish)

    if (sbsFinish > 0) {
      // Finished
      setText("Finished")
      return;
    }

    const sbsStart = timeNow.substract(timeStart)
    if (sbsStart > 0) {
      // Happening
      const time = timeNow.toRemainingTime(Math.abs(sbsFinish))
      setText(`${time} left`)
    } else {
      // Early
      const time = timeNow.toRemainingTime(Math.abs(sbsStart))
      setText(`${time} early`)
    }
  }

  return (
    <p>{text()}</p>
  )
}
