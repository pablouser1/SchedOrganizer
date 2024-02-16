import { createSignal } from "solid-js"
import type Schedule from "../models/Schedule"
import Time from "../helpers/Time"

interface Props {
  schd: Schedule
}

export default function Tracker(props: Props) {
  const { schd } = props

  const now = new Date()

  const currentTime = new Time(now.toTimeString().split(' ')[0])

  const [ text, setText ] = createSignal("Loading...")

  return (
    <>
    <p>{text()}</p>
    <p>{currentTime.toSeconds}</p>
    </>
  )
}
