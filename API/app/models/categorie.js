/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('categorie', {
    'id_categorie': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      primaryKey: true,
      comment: "null",
      autoIncrement: true
    },
    'categorie': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    }
  }, {
    tableName: 'categorie'
  });
};
