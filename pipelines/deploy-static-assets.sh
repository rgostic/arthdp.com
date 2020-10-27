#!/bin/sh

if [ -z ${TASK_RUNNER_PATH+x} ] || [ -z ${STATIC_ASSET_PATH+x} ]; then
  echo "shell variable 'TASK_RUNNER_PATH' or 'STATIC_ASSET_PATH' is not defined in Pipelines settings."

  exit 1;
fi

export CI=true

yarn --cwd $BITBUCKET_CLONE_DIR/$TASK_RUNNER_PATH install \
    && yarn --cwd $BITBUCKET_CLONE_DIR/$TASK_RUNNER_PATH production \

if [ -z "$SERVER_USER" ] || [ -z "$SERVER_HOST" ]; then
  echo "shell variable 'SERVER_USER' or 'SERVER_HOST' is not defined in Pipelines settings."

  exit 1;
fi

RSYNC_PIPELINES_PATH=$BITBUCKET_CLONE_DIR/${TASK_RUNNER_PATH%/}
RSYNC_DEPLOY_PATH=$DEPLOY_PATH/${TASK_RUNNER_PATH%/}

rsync -azv --checksum --perms \
    $BITBUCKET_CLONE_DIR/$STATIC_ASSET_PATH/ \
    $SERVER_USER@$SERVER_HOST:$DEPLOY_PATH/$STATIC_ASSET_PATH

ssh -t $SERVER_USER@$SERVER_HOST wp --path=$DEPLOY_PATH cache flush
