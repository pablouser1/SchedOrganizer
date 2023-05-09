import { type Component, For } from "solid-js";
import Extra from "../interfaces/Extra";

const ExtraHandler: Component<{extra: Extra[]}> = props => {
  return (
    <For each={props.extra}>{item =>
      <p class="new-line">
        {item.type === "url" ? <a href={item.data} target="_blank">{item.title}</a> : (
          <>
            <strong>{item.title}</strong>
            <br />
            {item.data}
          </>
        )}
      </p>
    }</For>
  )
}

export default ExtraHandler;
