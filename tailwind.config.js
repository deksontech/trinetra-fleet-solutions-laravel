import forms from '@tailwindcss/forms';

export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './app/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        navy: '#081827',
        ink: '#16212f',
        steel: '#627083',
        mist: '#eef2f6',
        gold: '#b88945',
      },
      boxShadow: {
        soft: '0 18px 55px rgba(8, 24, 39, 0.12)',
      },
    },
  },
  plugins: [forms],
};
