import type { Component } from "solid-js";

const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

const Time: Component = () => {
    const d = new Date();
    const day = days[d.getDay()];
 
    const dStr = d.toLocaleDateString(navigator.language)
    return <p>Today is <b>{day}</b>: {dStr}</p>
}

export default Time;
