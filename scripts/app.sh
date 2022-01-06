#!/bin/bash
set -o nounset
set -o errexit
set -o pipefail

readonly SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && "pwd")"
readonly DOCKER_COMPOSE_FILE="$(realpath "$SCRIPT_DIR/../docker/docker-compose.yml")"
readonly ROOT_DIR="$(realpath "$SCRIPT_DIR/../")"

cd $ROOT_DIR

Y="\033[0;33m"  # Color Yellow
G="\033[0;92m"  # Color Green
B="\033[0;36m"  # Color Blue
N="\033[0;0m"   # Color Neutral

case ${1-:''} in
    start)
        docker-compose -f "${DOCKER_COMPOSE_FILE}" up -d
    ;;
    stop)
        docker-compose -f "${DOCKER_COMPOSE_FILE}" down
    ;;
    restart)
        docker-compose -f "${DOCKER_COMPOSE_FILE}" down
        docker-compose -f "${DOCKER_COMPOSE_FILE}" up -d
    ;;
    pull)
        docker-compose -f "${DOCKER_COMPOSE_FILE}" pull
    ;;
    *)
        echo -e ""
        echo -e "The ${B}anonrelay${N} application stack command line interface"
        echo -e ""
        echo -e "${Y}Usage:${N}"
        echo -e "  ${B}${0}${N} [COMMAND]"
        echo -e ""
        echo -e "${Y}Commands:${N}"
        echo -e "  ${G}start${N} \tStarts the docker development stack with all services"
        echo -e "  ${G}stop${N} \t\tStops all services from the docker development stack and removing the containers"
        echo -e "  ${G}restart${N} \tRestarts all services from the docker development stack"
        echo -e ""
    ;;
esac
