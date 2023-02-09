import type { Component } from "solid-js";

const Time: Component = () => {
    const d = new Date();
 
    const dStr = d.toLocaleDateString(navigator.language)
    return <p>Today is {dStr}</p>
}

export default Time;
