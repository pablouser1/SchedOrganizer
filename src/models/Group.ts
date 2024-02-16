import Common from "./Common";

export default class Group extends Common {
  year!: number
  group!: string

  static get tableName() {
    return 'groups';
  }
}
