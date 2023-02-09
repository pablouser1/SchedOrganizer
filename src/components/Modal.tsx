import type { Component } from "solid-js";
import ModalProps from "../interfaces/ModalProps";
import ExtraHandler from "./ExtraHandler";

const Modal: Component<ModalProps> = props => {
  const closeModal = () => {
    props.setOpened(false)
  }

  return (
    <dialog open={props.opened} onClick={e => e.target.tagName === 'DIALOG' && closeModal()}>
      <article>
        <header>
          <a onClick={closeModal} aria-label="Close" class="close clickable"></a>
          {props.subject.name}
        </header>
        <ExtraHandler extra={props.subject.extra} />
      </article>
    </dialog>
  )
};

export default Modal;
