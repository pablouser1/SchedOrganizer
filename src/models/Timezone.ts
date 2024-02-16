import Common from "./Common";

export default class Timezone extends Common {
  start!: string;
  finish!: string;

  static get tableName() {
    return 'timezones';
  }
}
