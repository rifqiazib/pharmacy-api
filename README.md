
## API Reference
All endpoint need {bearer_token} 
except :
```http
  POST /api/register
```
```http
  POST /api/login
```

#### Register

```http
  POST /api/register
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. user name|
| `email` | `string` | **Required**. email user unique |
| `password` | `string` | **Required**. user password |

#### Login

```http
  POST /api/login
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. email  |
| `password` | `string` | **Required**. password  |

#### Logout

```http
  POST /api/login
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine list

```http
  GET /api/medicine
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine by query

```http
  GET /api/medicine?parameter=
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `search` | `string` | search by name medicine  |
| `medicine_category` | `id` | search by medicine_category  |
| `medicine_type` | `string` | search by name medicine type  |

Medicine type have value : ['Tablet', 'Kapsul', 'Sirup', 'Salep']

#### Get medicine by id

```http
  GET /api/medicine/{id}
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | show by id medicine  |

Medicine type have value : ['Tablet', 'Kapsul', 'Sirup', 'Salep']

#### Create medicine

```http
  POST /api/medicine/
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `medicine_category` | `integer` | **Required**   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |
| `type` | `string` | **Required**   |
| `expired_date` | `date` | **Required**   |
| `stock` | `integer` | **Required**   |
| `selling_price` | `integer` | **Required**   |

#### Update medicine

```http
  PUT /api/medicine/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `medicine_category` | `integer` | **Required**   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |
| `type` | `string` | **Required**   |
| `expired_date` | `date` | **Required**   |
| `stock` | `integer` | **Required**   |
| `selling_price` | `integer` | **Required**   |

#### Delete medicine

```http
  DELETE /api/medicine/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

#### Get medicine category list

```http
  GET /api/medicine/category
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine by id

```http
  GET /api/medicine/category/{id}
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | show by id medicine  |


#### Create medicine category

```http
  POST /api/medicine/category/
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |

#### Update medicine category

```http
  PUT /api/medicine/category/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |

#### Delete medicine category

```http
  DELETE /api/medicine/category/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |


## API Reference
All endpoint need {bearer_token} 
except :
```http
  POST /api/register
```
```http
  POST /api/login
```

#### Register

```http
  POST /api/register
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. user name|
| `email` | `string` | **Required**. email user unique |
| `password` | `string` | **Required**. user password |

#### Login

```http
  POST /api/login
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. email  |
| `password` | `string` | **Required**. password  |

#### Logout

```http
  POST /api/login
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine list

```http
  GET /api/medicine
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine by query

```http
  GET /api/medicine?parameter=
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `search` | `string` | search by name medicine  |
| `medicine_category` | `id` | search by medicine_category  |
| `medicine_type` | `string` | search by name medicine type  |

Medicine type have value : ['Tablet', 'Kapsul', 'Sirup', 'Salep']

#### Get medicine by id

```http
  GET /api/medicine/{id}
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | show by id medicine  |

Medicine type have value : ['Tablet', 'Kapsul', 'Sirup', 'Salep']

#### Create medicine

```http
  POST /api/medicine/
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `medicine_category` | `integer` | **Required**   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |
| `type` | `string` | **Required**   |
| `expired_date` | `date` | **Required**   |
| `stock` | `integer` | **Required**   |
| `selling_price` | `integer` | **Required**   |

#### Update medicine

```http
  PUT /api/medicine/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `medicine_category` | `integer` | **Required**   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |
| `type` | `string` | **Required**   |
| `expired_date` | `date` | **Required**   |
| `stock` | `integer` | **Required**   |
| `selling_price` | `integer` | **Required**   |

#### Delete medicine

```http
  DELETE /api/medicine/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

#### Get medicine category list

```http
  GET /api/medicine/category
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine by id

```http
  GET /api/medicine/category/{id}
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | show by id medicine  |


#### Create medicine category

```http
  POST /api/medicine/category/
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |

#### Update medicine category

```http
  PUT /api/medicine/category/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |

#### Delete medicine category

```http
  DELETE /api/medicine/category/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

