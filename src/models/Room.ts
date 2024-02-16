import Common from "./Common";

export default class Room extends Common {
  location!: string;
  description!: string;

  static get tableName() {
    return 'rooms';
  }
}
