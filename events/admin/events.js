export default {
  async onLinkPickerGetOptions400(options) {
    options.push(...(await import('./linkPickerGetOptions')).default);
  },
};
