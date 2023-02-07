import { useLocation, useNavigate } from "@solidjs/router";
import { Component, For } from "solid-js";
import schedules from '../data/schedules.json';

const Navbar: Component = () => {
  const navigation = useNavigate()
  const location = useLocation()

  return (
    <nav>
      <ul>
        <li><strong><a href="https://github.com/pablouser1/SchedOrganizer" target="_blank">SchedOrganizer</a></strong></li>
      </ul>
      <ul>
        <li>
          <select onChange={e => navigation(e.currentTarget.value)}>
            <For each={schedules}>{(schedule, i) => (
              <option value={`/${i() + 1}`} selected={`/${i() + 1}` === location.pathname}>{schedule.name}</option>
            )}</For>
          </select>
        </li>
      </ul>
    </nav>
  )
}

export default Navbar;
