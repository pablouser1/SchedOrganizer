import type { Setter } from "solid-js";
import Entry from "./Entry";

export default interface ModalProps {
    opened: boolean;
    entry: Entry;
    setOpened: Setter<boolean>;
}
