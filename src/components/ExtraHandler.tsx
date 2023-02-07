import { Component, For } from "solid-js";
import Extra from "../interfaces/Extra";

const ExtraHandler: Component<{extra: Extra[]}> = props => {
  return (
    <For each={props.extra}>{item =>
      item.type === "url" ? <a href={item.data} target="_blank">{item.title}</a> : (
        <>
          <b>{item.title}</b>
          <p class="new-line">{item.data}</p>
        </>
      )
    }</For>
  )
}

export default ExtraHandler;
