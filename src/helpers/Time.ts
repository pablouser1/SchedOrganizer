export default class Time {
  private _secs: number = 0;

  constructor(t: string) {
    this._secs = this.toSeconds(t)
  }

  substract(otherT: string): number {
    const otherSecs = this.toSeconds(otherT);

    return this._secs - otherSecs;
  }

  toSeconds(time?: string): number {
    if (time !== undefined) {
      let seconds = 0;
      const split = time.split(":")
      if (split.length === 2) {
        const h = parseInt(split[0])
        const m = parseInt(split[1])
  
        // Handling hours
        seconds += h * 60 * 60
        // Handling minutes
        seconds += m * 60
      }
  
      return seconds
    }

    return this._secs;
  }
}
