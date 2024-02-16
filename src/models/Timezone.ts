import Common from "./Common";

export default class Timezone extends Common {
  from!: string;
  to!: string;

  static get tableName() {
    return 'timezones';
  }
}
