import Room from "../models/Room"

export default class Rooms {
  async all(): Promise<Room[]> {
    const rooms = await Room.query()
    return rooms
  }

  async one(id: number): Promise<Room | null> {
    const room = await Room.query().findById(id)
    return room ?? null
  }
}
