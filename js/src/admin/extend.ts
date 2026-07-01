import Extend from 'flarum/common/extenders';
import app from 'flarum/admin/app';

const extensionId = 'zephyrisle-fof-formatting-pro';
const pluginSettings = ['autoaudio', 'netease', 'bilibili'] as const;

const t = (key: string) => app.translator.trans(`${extensionId}.${key}`, {}, true);

const admin = new Extend.Admin();

pluginSettings.forEach((plugin) => {
  admin.setting(() => ({
    setting: `${extensionId}.plugin.${plugin}`,
    label: t(`admin.plugins.${plugin}`),
    type: 'boolean',
  }));
});

admin.setting(() => ({
  setting: `${extensionId}.audio_css`,
  label: t('admin.settings.audio_css'),
  help: t('admin.settings.audio_css_help'),
  type: 'textarea',
}));

export default [admin];
