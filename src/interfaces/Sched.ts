interface Row {
  from: string;
  to: string;
  ids: number[]
}

export default interface Sched {
  name: string;
  items: Row[]
}
