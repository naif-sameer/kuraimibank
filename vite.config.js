import { defineConfig } from "vite";
import { fileURLToPath, URL } from "url";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: ["./resources/scss/app.scss", "./resources/js/app.js"],
    }),
    {
      name: "blade",
      handleHotUpdate({ file, server }) {
        if (file.endsWith(".blade.php")) {
          server.ws.send({
            type: "full-reload",
            path: "*",
          });
        }
      },
    },
  ],

  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./resources", import.meta.url)),
    },
  },
});
