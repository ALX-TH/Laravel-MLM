import colors from 'colors';
import path from 'path';
import notifier from 'node-notifier';

module.exports = function errorHandler(error) {
    const date = new Date();
    const cwd = process.cwd();

    const now = date.toTimeString().split(" ")[0];

    const title = error.name + " in " + error.plugin;

    const shortMessage = error.message.split("\n")[0];

    const message =
        "[" +
        colors.grey(now) +
        "] " +
        [title.bold.red, "", error.message, ""].join("\n");

    console.log(message);

    notifier.notify({
        title: title,
        message: shortMessage,
        icon: path.join(cwd, "tools/icons/error.svg")
    });

    this.emit("end");
};
