import del from "del";

const clean = callback => del([
    'release/admin/css/*.css',
    'release/admin/js/*.js',
], callback);

export default clean;