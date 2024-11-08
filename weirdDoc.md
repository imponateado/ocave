**Endpoint**: `{{urlBase}}/ocave/backend/filterSalesReport.php`

**Método**: `GET`

**Descrição**:  
Retorna um JSON com os dados filtrados de histórico de ligações feito pelas vendas.

## Parâmetros de Consulta

- `startDate` (opcional): Data de início para filtragem. Formato: `YYYY-MM-DD`
- `endDate` (opcional): Data de término para filtragem. Formato: `YYYY-MM-DD`
- `vendedor` (opcional): Filtra pelo nome do vendedor.
- `rota` (opcional): Filtra pelo ID da rota.

## Exemplo de Requisição

```javascript
fetch('/path/to/script.php?startDate=2024-01-01&endDate=2024-12-31&vendedor=JohnDoe&rota=1')
  .then(response => response.json())
  .then(data => {
    console.log(data); // Use esses dados para atualizar a UI
  });
```

## Resposta
Content-Type: application/json

Corpo: Um array de objetos representando dados de vendas e rotas.

## Exemplo de resposta
[
  {
    "data": "2024-01-01",
    "vendedor": "JohnDoe",
    "IDROTA": 1,
    "otherField": "value"
  },
  ...
]

## Códigos de Status HTTP

200 OK: Requisição bem-sucedida. Os dados são retornados no corpo da resposta.

500 Internal Server Error: Ocorreu um erro no servidor. A requisição não pôde ser processada.
