#!/bin/bash

if [[ -z "$1" ]]; then
  echo 'No parameter provided.'
  exit 1;
fi

_action=`echo $1 | cut -d"=" -f2-`

if [[ -z $_action ]]; then
  echo 'Action is not valid.'
  exit 1;
fi

cd ${LANDO_MOUNT}/${THEME_PATH}
${_action}
