//import { fileURLToPath, URL } from "node:url"

/// <reference types="vitest" />
import { defineConfig } from "vite"
import type { UserConfig as VitestUserConfigInterface } from "vitest/config"

const vitestConfig: VitestUserConfigInterface = {
  test: {
    globals: true,
    environment: "jsdom",
  },
}

import vue from "@vitejs/plugin-vue"
import { resolve } from 'path'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: /*{
      "@": fileURLToPath(new URL("./src", import.meta.url)),
    },*/
    [
      { find: '@components', replacement: resolve(__dirname, 'src/components') },
      { find: '@constants', replacement: resolve(__dirname, 'src/constants') },
      { find: '@hooks', replacement: resolve(__dirname, 'src/hooks') },
      { find: '@assets', replacement: resolve(__dirname, 'src/assets') },
      { find: '@services', replacement: resolve(__dirname, 'src/services') },
      { find: '@utils', replacement: resolve(__dirname, 'src/utils') },
      { find: '@pages', replacement: resolve(__dirname, 'src/pages') },
    ],
  },
  test: vitestConfig.test,
})
