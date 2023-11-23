
FilePond.registerPlugin(
  FilePondPluginImagePreview,
  FilePondPluginImageCrop,
  FilePondPluginImageExifOrientation,
  FilePondPluginImageFilter,
  FilePondPluginImageResize,
  FilePondPluginFileValidateSize,
  FilePondPluginFileValidateType,
)

// Konfigurasi FilePond
const filePondConfig = {
  credits: null,
  allowImagePreview: false,
  allowMultiple: false,
  allowFileEncode: false,
  required: true,
  // acceptedFileTypes: ["image/png"],
  // fileValidateTypeDetectType: (source, type) =>
  //   new Promise((resolve, reject) => {
  //     // Do custom type detection here and return with promise
  //     resolve(type)
  //   }),
  storeAsFile: true,
};

// Menerapkan konfigurasi untuk setiap elemen
const fileInputs = [
  "#path",
];

// Filepond: Basic
fileInputs.forEach((input) => {
  FilePond.create(document.querySelector(input), filePondConfig);
});