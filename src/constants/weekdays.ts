import Storage from "../helpers/Storage";

export const WEEKDAYS = [
  {
    id: 0,
    name: "Sunday"
  },
  {
    id: 1,
    name: "Monday"
  },
  {
    id: 2,
    name: "Tuesday"
  },
  {
    id: 3,
    name: "Wednesday"
  },
  {
    id: 4,
    name: "Thursday"
  },
  {
    id: 5,
    name: "Friday"
  },
  {
    id: 6,
    name: "Saturday"
  }
];

export const getWeekdays = () => {
  const offset = Storage.offset()

  const head = WEEKDAYS.slice(offset)
  const tail = WEEKDAYS.slice(0, offset)

  return [...head, ...tail]
}
