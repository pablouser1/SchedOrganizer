import { defineConfig } from 'astro/config';

import solidJs from "@astrojs/solid-js";

// https://astro.build/config
export default defineConfig({
  site: import.meta.env.APP_URL,
  vite: {
    build: {
      sourcemap: true
    }
  },
  integrations: [solidJs()]
});
