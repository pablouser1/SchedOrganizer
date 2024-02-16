import Timezone from "../models/Timezone";

export default class Timezones {
  async all(): Promise<Timezone[]> {
    const tzs = await Timezone.query().withGraphFetched('group')
    return tzs
  }

  async one(id: number): Promise<Timezone | null> {
    const tz = await Timezone.query().findById(id)
    return tz ?? null
  }
}
