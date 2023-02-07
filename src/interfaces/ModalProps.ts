import { Setter } from "solid-js";
import Subject from "./Subject";

export default interface ModalProps {
    opened: boolean;
    subject: Subject;
    setOpened: Setter<boolean>;
}
