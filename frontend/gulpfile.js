'use strict';

import { task } from 'gulp';

import buildAdminTemplate from './src/admin_template/gulp/tasks/build';

task('build-admin', buildAdminTemplate);