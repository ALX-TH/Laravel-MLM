import { parallel, series } from 'gulp';

import scripts from './scripts';
import style from './style';
import clean from './clean';

const build = series(
    clean,
    //parallel(
        scripts,
        style,
    //),
);

export default build;
