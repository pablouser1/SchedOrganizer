import Schedule from "../models/Schedule";

export default class Schedules {
  async all(): Promise<Schedule[]> {
    const schedules = await Schedule.query().withGraphFetched('subject')
    return schedules
  }

  async one(id: number): Promise<Schedule | null> {
    const sched = await Schedule.query().findById(id).withGraphFetched('subject')
    return sched ?? null
  }

  async fromWeekday(num: number): Promise<Schedule[]> {
    const schedules = await Schedule.query().where("weekday", "=", num).withGraphFetched('subject')
    return schedules
  }
}
