# BB Seguros theme

## Pre-requisites
Before starting, ensure that you are using at least the latest LTS release of
Node.js. The current version is v10.16.3. So, once Node.js has been installed,
proceed with the package installation:

To install the required packages use
```
npm install
```

## Linting Javascript
After finishing up the Javascript development, make sure to validate it with

```
gulp eslint
```

## Working on CSS
Drupal 8 follows a SMACSS-style categorization of its CSS rules. More details
can be found at the documentations below:
- https://www.drupal.org/docs/develop/standards/css/css-file-organization-for-drupal-8
- https://www.drupal.org/node/1887918#separate-concerns

When writting SASS locally you can use the watcher to make changes and have them
compiled as you save through your IDE.

```
gulp watch
```
