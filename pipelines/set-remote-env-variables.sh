#!/bin/sh

# Bitbucket Env Vars
echo "export BITBUCKET_BUILD_NUMBER=$BITBUCKET_BUILD_NUMBER;"
echo "export BITBUCKET_CLONE_DIR=$BITBUCKET_CLONE_DIR;"
echo "export BITBUCKET_COMMIT=$BITBUCKET_COMMIT;"
echo "export BITBUCKET_REPO_OWNER=$BITBUCKET_REPO_OWNER;"
echo "export BITBUCKET_REPO_OWNER_UUID=$BITBUCKET_REPO_OWNER_UUID;"
echo "export BITBUCKET_REPO_SLUG=$BITBUCKET_REPO_SLUG;"
echo "export BITBUCKET_REPO_UUID=$BITBUCKET_REPO_UUID;"
echo "export BITBUCKET_BRANCH=$BITBUCKET_BRANCH;"
echo "export BITBUCKET_TAG=$BITBUCKET_TAG;"
echo "export BITBUCKET_BOOKMARK=$BITBUCKET_BOOKMARK;"
echo "export BITBUCKET_PARALLEL_STEP=$BITBUCKET_PARALLEL_STEP;"
echo "export BITBUCKET_PARALLEL_STEP_COUNT=$BITBUCKET_PARALLEL_STEP_COUNT;"

# User Defined Env Vars
echo "export DEPLOY_PATH=$DEPLOY_PATH;"
echo "export SERVER_USER=$SERVER_USER;"
echo "export SERVER_HOST=$SERVER_HOST;"
