/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('role', {
    'id_role': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      primaryKey: true,
      comment: "null",
      autoIncrement: true
    },
    'role': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    }
  }, {
    tableName: 'role'
  });
};
