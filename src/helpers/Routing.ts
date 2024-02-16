import type Common from "../models/Common"

export function toStaticPath<T extends Common>(items: T[]) {
  return items.map(item => {
    return {
      params: {
        id: item.id
      },
      props: item
    }
  })
}
