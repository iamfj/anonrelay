#!/bin/bash
set -o nounset
set -o errexit
set -o pipefail

readonly SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && "pwd")"
readonly ROOT_DIR="$(realpath "$SCRIPT_DIR/../")"
readonly DOCKER_COMPOSE_FILE="$(realpath "$SCRIPT_DIR/../docker/docker-compose.yml")"

cd $ROOT_DIR

B="\e[1m"       # Bold
U="\e[4m"       # Underline
R="\033[0;31m"  # Color Red
N="\033[0;0m"   # Color Neutral

if [ $( docker ps -a | grep anonrelay_php_cli | wc -l ) -eq 0 ]; then
  echo -e ""
  echo -e "${R}${B}Error: Could not find the anonrelay application container.${N}"
  echo -e "${R}       Please use the ${U}app.sh${N}${R} to start the development stack!${N}"
  echo -e ""
  exit 1
fi

docker-compose -f "${DOCKER_COMPOSE_FILE}" \
  run --rm -u "$(id -u):$(id -g)" cli -f "bin/console" "${@}"
