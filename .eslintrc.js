module.exports = {
    parserOptions: {
        parser: 'babel-eslint',
        ecmaVersion: 2018,
        sourceType: "module"
    },
    env: {
        browser: true,
        node: true,
        es6: true
    },
    extends: ['eslint:recommended', 'plugin:vue/recommended'],
    globals: {
        route: false
    },
    rules: {
        "import/no-unresolved": 0,
        "import/no-unassigned-import": 0,
        "indent": ["error", 4],
        "eqeqeq": [2, "smart"],
        "no-new": 0,
        "no-undef": 1,
        "no-unused-vars": 1,
        "no-console": ["error", {
            "allow": ["log", "warn", "error"]
        }],
        "no-floating-decimal": 2,
        "no-multi-spaces": [2, {
            "exceptions": {
                "ImportDeclaration": true,
                "VariableDeclarator": true
            }
        }],
        "no-multi-str": 2,
        "camelcase": 1,
        "eol-last": 1,
        "indent": ["error", 4],
        "linebreak-style": ["error", "unix"],
        "quotes": [2, "single", "avoid-escape"],
        "semi": ["error", "never"],
        "space-before-blocks": 2,
        "space-before-function-paren": ["error", {
            "anonymous": "always",
            "named": "always",
            "asyncArrow": "always"
        }],
        "constructor-super": 2,
        "arrow-spacing": 2,
        "vue/html-indent": ["error", 4, {
            "alignAttributesVertically": true
        }],
        "vue/script-indent": ["error", 4],
        "vue/singleline-html-element-content-newline": ["error", {
            "ignoreWhenNoAttributes": true,
            "ignoreWhenEmpty": true,
            "ignores": ["pre", "textarea", "p", "a", "dt", "dd", "b", "span"]
        }],
        "vue/max-attributes-per-line": ["error", {
            "singleline": 2,
            "multiline": {
                "max": 1,
                "allowFirstLine": false
            }
        }]
    },
}
