/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('produit', {
    'id_produit': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      primaryKey: true,
      comment: "null",
      autoIncrement: true
    },
    'nom': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'description': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'prix': {
      type: DataTypes.FLOAT,
      allowNull: false,
      comment: "null"
    },
    'urlImage': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    },
    'id_categorie': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      comment: "null",
      references: {
        model: 'categorie',
        key: 'id_categorie'
      }
    }
  }, {
    tableName: 'produit'
  });
};
