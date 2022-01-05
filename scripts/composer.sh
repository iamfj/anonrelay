#!/bin/bash
set -o nounset
set -o errexit
set -o pipefail

readonly SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && "pwd")"
readonly APP_DIR="$(realpath "$SCRIPT_DIR/../app")"

docker run --rm --interactive --tty \
  --volume "$APP_DIR:/app" \
  --user "$(id -u):$(id -g)" \
  composer $@
