#!/bin/sh

if [ -z ${DEPLOY_PATH+x} ]; then
  echo "shell variable 'DEPLOY_PATH' is not defined in Pipelines settings."

  exit 1;
fi

if [ -z "$BITBUCKET_TAG" ] && [ -z "$BITBUCKET_BRANCH" ]; then
  echo "shell variable 'BITBUCKET_TAG' or 'BITBUCKET_BRANCH' is not defined in Pipelines settings."

  exit 1;
fi

if [ -n "$(git -C $DEPLOY_PATH status --porcelain)" ]; then
  echo "Repo is NOT in clean state. Resolve and attempt to deploy again.";

  git -C $DEPLOY_PATH status;

  exit 1;
fi

echo "Repo is in clean state";

git -C $DEPLOY_PATH fetch;

if [ -n "$BITBUCKET_TAG" ]; then
  git -C $DEPLOY_PATH checkout -f tags/$BITBUCKET_TAG;
fi

if [ -n "$BITBUCKET_BRANCH" ]; then
  git -C $DEPLOY_PATH checkout -f origin/$BITBUCKET_BRANCH;
fi
  
exit 0;
